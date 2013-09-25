<?php
/**
* Component reponsável por manipular  arquivo de permissões do SVN  'svn-access-control'.
*
*/
class SvnComponent extends Component {

/**
 * svnAcl method
 *
 * @param array $usuarios, type find list. Caso passado array() empty grupo de permissões é apagado.
 * @param array $grupo, type find all.
 * @param array $repo, type find all.
 */
    public function svnAcl($usuarios, $grupo, $repo){
        $filename = Configure::read('path.svn.access-control').'/svn-access-control';
        $idGroup = $repo['Repositorio']['id'].$grupo['Equipe']['id'];
        $handle = @fopen($filename, "r");
        if ($handle) {
            $this->svnAclDelete($handle, $idGroup, $filename);
            if(!empty($usuarios)){
                $this->svnAclCreate($usuarios, $grupo, $repo);
            }
            fclose($handle);
        } else {
            $this->svnAclCreate($usuarios, $grupo, $repo);
        }
    }

    private function svnAclCreate($usuarios, $grupo, $repo){
        $string = "\n";
        $idGroup = $repo['Repositorio']['id'] . $grupo['Equipe']['id'];
        $filename = Configure::read('path.svn.access-control').'/svn-access-control';
        $grupo['Equipe']['nome'] = strtolower($grupo['Equipe']['nome']);
        $string .= "###" . $idGroup . "###\n";
        $string .= "[groups]\n";
        $string .= $grupo['Equipe']['nome'] . ' = ';
        foreach ($usuarios as $value) {
            $string .= $value. ', ';
        }
        $string .= "\n\n";
        $string .= "[" . $repo['Repositorio']['nome'] . ":/]\n";
        $string .= "@" . $grupo['Equipe']['nome'] . ' = rw';
        $string .= "\n###" . $idGroup . "###\n";
        $fp = fopen($filename, 'a');
        fwrite($fp, $string);
        fclose($fp);
    }

    private function svnAclDelete($handle, $idGroup, $filename){
        $buffer = '';
        while (!feof($handle)) {
            $buffer .= trim(fgets($handle, 4096))."\n";
        }
        $buffer = ereg_replace("###" . $idGroup . "###*(.|\s)+.?###" . $idGroup . "###+",'', $buffer);
        unlink($filename);
        $fp = fopen($filename, 'a');
        fwrite($fp, trim($buffer));
        fclose($fp);
    }
}
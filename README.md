Collabdev
=========
A proposta é desenvolver um gerenciador de controle de versão SVN/GIT para facilitar a configuração e manutenção de repositórios
de equipes colaborativas de desenvolvimento que tenham que manter o código fonte em ambiente de infra-estrutura interna.


##Ambiente
- Apache +[mod_rewrite](http://book.cakephp.org/2.0/en/installation/url-rewriting.html)
- PHP 5.3.x
- MySQL 
- PHPUnit
- SVN
- GIT

[Vagrant VM with CentOS 6.3](https://github.com/adhenawer/vagrant-puppet-centos-php-apache)

##Configuração
- Executar script SQL **/app/Config/Schema/collabdev.sql**
- Configurar database **/app/Config/database.php**
- Inserir o path do controle de versão no arquivo **/app/Config/paths.php**

***

####Login usuários default (grupo 1,2 e 3)
- admin
- gerenciador
- colaborador

senha **123**

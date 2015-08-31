# phpConfigLoader
Class to admin custom parameters for you PHP Aplication. Works with json, array and ini files.

*Biblioteca para administração de ajustes de aplicação de sistemas em php. Funciona com json, array e arquivos ini.*

### Installation

Just copy the file class.phpcfgloader.php and any other config files keeping the files tree or change the configs inside the class. Fill it up with your parameters.
Then initialize the class:

*Apenas copie o arquivo class.phpcfgloader.php e qualquer outro arquivo de configuração mantendo a árvore ou configurando o mesmo ai instanciar a classe. Preencha os arquivos com os seus parâmetros. Depois inicialize a classe:*

```
    include 'class/class.phpcfgloader.php';

    $cfg = new cfgLoader();
```

Access all your seetings with:

*Acesse seus ajustes com:*

```
    $cfg->settingname;
```

### Version
1.0.1


### Credits
Based upon this question in Stack Overflow:

*Baseado nessa dúvida no Stack Overflow:*

http://stackoverflow.com/questions/3724584/what-is-the-best-way-to-save-config-variables-in-a-php-web-app
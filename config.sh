echo "Please enter your plugin name:"
read pluginname
mv jamplugin.php $pluginname".php"
find . -type f | xargs sed -i  's/jamplugin/'$pluginname'/g'

echo "Please enter your Plugin URI:" 
read pluginuri
oldpluginuri="https://"$pluginname".com"
sed -i "s~$oldpluginuri~$pluginuri~g" ./$pluginname".php"


echo "Please enter your Plugin description:" 
read plugindescription
oldplugindescription="A special wordpress plugin for "$pluginname".com"
sed -i "s~$oldplugindescription~$plugindescription~g" ./$pluginname".php"

sudo yarn install
sudo yarn upgrade

sudo composer install
sudo composer update


rm -rf .git
git init && git status && git add . && git commit -am "Initial commit" && git status
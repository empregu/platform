sudo apt-get remove --purge --force-yes *mysql*
sudo apt-get autoremove --force-yes --purge
sudo apt-get autoclean --force-yes
sudo apt-get clean --force-yes
sudo rm -rf /var/lib/mysql
sudo apt-get update --force-yes
sudo apt-get upgrade --force-yes
sudo apt install --force-yes mysql-server-5.7
sudo apt install --force-yes mysql-client-5.7
sudo /etc/init.d/mysql start

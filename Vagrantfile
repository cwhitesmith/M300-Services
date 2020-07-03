# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.define "apache" do |apache|
    apache.vm.box = "centos/8"
    apache.vm.hostname = "m300-apache"
    apache.vm.network "public_network", ip: "192.168.29.10"
      apache.vm.network "forwarded_port", guest: 80, host:8080, auto_correct:true
      apache.vm.provider "virtualbox" do |virtualbox|
        virtualbox.memory = "2084"
        virtualbox.gui = false
      end

      apache.vm.provision "shell", inline: <<-SHELL
            dnf install -y httpd
            systemctl enable firewalld
            systemctl enable httpd
            systemctl start firewalld
            systemctl start httpd
            systemctl status httpd
            firewall-cmd --zone=public --permanent --add-port 80/tcp
            firewall-cmd --reload
SHELL
        end
end

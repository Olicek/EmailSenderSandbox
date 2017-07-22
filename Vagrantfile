# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"

  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  config.vm.box_check_update = false

  # nastaveni site
  config.vm.network "private_network", ip: "192.168.44.20"

  # fix chyby "stdin: is not a tty"
  config.ssh.shell = "bash -c 'BASH_ENV=/etc/profile exec bash'"

  # Konfigurace virtualni masiny VirtualBoxu
  config.vm.provider "virtualbox" do |vb|
    # Nazev virtualni masiny
    vb.name = "EmailSenderSandbox"

    # pocet CPU (vlaken)
    vb.cpus = 1

    # Velikost operacni pameti
    vb.memory = "1024"
  end

  # Spusteni skriptu pred Ansiblem
  config.vm.provision "shell", inline: <<-SHELL
    # instalace pozadovanych aplikaci pro ansible
    apt-get install git zip unzip jq -y
  SHELL

  # Aktualizace nastaveni serveru pomoci Ansible playbooku
  config.vm.provision "ansible_local" do |ansible|
    ansible.galaxy_role_file = "./ansible/requirements.yml"
    ansible.galaxy_roles_path = "./temp/ansible/"
    ansible.playbook = "./ansible/playbook.yml"
  end

end

This project was made using homestead so for local testing make sure you have install
- VirtualBox
- Vagrant

Once those things are install you should be able to just do `vagrant up` on the terminal and it should create
every thing needed to run the project

After the virtual machine is created make sure you have run `composer install` and `npm install` within the virtual machine
the UI was made using the laravel mix helper to compile all .js and .css files so in order to compile them a make them
available for the browser just run `npm run dev` or `npm run hot` within the root folder on the virtual machine and you should be
able to type `http://image-uploader.test/` or `192.168.10.10` in the browser to access the app.



# Exchange Office
In this project everything runs on Docker containers, you need to have Docker and Docker Compose installed on your system. If you are using Windows please use WSL. Make sure that you shutdown services that are running on ports: 80 (Nginx, Apache, etc.) and 3306 (MySql). 

First run init command:
```
./init.sh
```

In the ```.env``` file enter next environment variables:
```
MAIL_MAILER=  
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=  
MAIL_PASSWORD=  
MAIL_ENCRYPTION=
```
For mail testing i use [Mailtrap](https://mailtrap.io/)

Register on [Currencylayer](https://currencylayer.com) website and get access key and enter it in next environment variable:
```
CURRENCY_LAYER_ACCESS_KEY=
```

Then run next command:
```
./start.sh
```
Wait for everything to be finished and give this permissions to Laravel storage folder (this is not good practice, but for local testing it should be just fine):
```
sudo chmod -R 777 storage
```
Then open your browser and go to ```localhost``` or ```127.0.0.1``` and test the app.

In order to update currencies exchange rates run next command:
```
./artisan.sh exchange_rates:update
```
When you're done with testing run next command in order to shutdown running Docker containers:
```
./down.sh
```

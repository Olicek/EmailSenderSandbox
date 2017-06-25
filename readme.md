# Sandbox of queue Email sender

This is realy primitive tester of queue Email sender

If you want to use SMTP server you have to make some `config.local.neon` file and set some configuration:

```
parameters:
  mailerSettings:
    useSMTP: on
    host: 'smtp.server'
    smtpAuth: on
    username: 'email@email.tld'
    password: '***'
    smtpSecure: 'tls'
    port: 421

```

Installation database:
```
./vendor/bin/cron emails:install -c ./src/config.local.neon 
```

Run sender command:
```
./vendor/bin/cron emails:send -c ./src/config.local.neon 
```

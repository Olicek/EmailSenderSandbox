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

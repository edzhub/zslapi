# ZSL Api 

### Publish Customization
```
php artisan vendor:publish --provider=Edzhub\Zslapi\ZslapiServiceProvider
```

### Please place this in env file
```
ZSL_MANAGER_TOKEN=<yourtoken>
```

if you have whitelisted domain
```
ZSL_CONTENT_URL=<yourwhitelisteddomain>/api
```
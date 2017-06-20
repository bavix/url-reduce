# build

```bash
chmod 777 bootstrap
chmod 777 bootstrap/cache
chmod 777 storage/logs
chmod 777 storage/purifier
chmod 777 storage/framework/cache
chmod 777 storage/framework/sessions
chmod 777 storage/framework/views
chmod 777 public/upload -R

composer upd

./artisan admin:install
./artisan migrate
./artisan db:seed

cd public
npm i
```

# if test
```bash
./artisan db:seed --class=TestSeeder
```

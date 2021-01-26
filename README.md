# prac_laravel
practice project course for specialist

## routes and requests

curl -v -d '{
	"name":"Alex",
	"surname": "Panteleev",
	"email": "alex@mail.ru",
	"password": "mYSecre34_",
	"password_confirmation": "mYSecre34_"
}' \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
https://prac.alexp007.ru/register

curl -v -d "name:alex" -H "Authorization: Bearer MgGt4KwA6op3aeMg7COahx74wuIhZTTuEI9vIwIstqDNK6uN0QExIcxvmoqd" https://prac.alexp007.ru/logout

curl -v -d '{
	"email": "alex@mail.ru",
	"password": "mYSecre34_"
}' \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
https://prac.alexp007.ru/login

curl -H "Authorization: Bearer AdZlpfsOUTPJL3SpvUvXp4aHZiwvvmzsYSKurxknNg3TMByzrLlvFefWnN2" https://prac.alexp007.ru/api/test

# prac_laravel
practice project course for specialist

## routes and requests

### User

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

## Apartment

curl -v -d '{
"rooms":"3",
"meters": "64.5",
"city": "Москва",
"address": "Перерва 2",
"metro": "Перово",
"price": "500000"
}' \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-H "Authorization: Bearer jolAgDo53xLbefTtXJagu9eL57684AHy3qAe1qWzLBGPWwkx02lKA7ckQdE2" \
https://prac.alexp007.ru/api/apartment

curl -v -X PATCH -d '{
"rooms":"3",
"meters": "70",
"city": "Москва",
"address": "Обновленная",
"metro": "Перово",
"price": "500000"
}' \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-H "Authorization: Bearer jolAgDo53xLbefTtXJagu9eL57684AHy3qAe1qWzLBGPWwkx02lKA7ckQdE2" \
https://prac.alexp007.ru/api/apartment/1

curl \
-H "Accept: application/json" \
-H "Authorization: Bearer lEGiH4LXskI0eil42HhLKWWIg1OpZgipdaN7t87sXDLxyk4Y6hs5HOKS3hxp" \
-F "image=@/Users/alexanderpanteleev/Desktop/web/images/1.jpg" \
https://prac.alexp007.ru/api/apartment/1/image

curl -v \
-H "Accept: application/json" \
-H "Authorization: Bearer lEGiH4LXskI0eil42HhLKWWIg1OpZgipdaN7t87sXDLxyk4Y6hs5HOKS3hxp" \
https://prac.alexp007.ru/api/apartment/1

curl -v -X DELETE \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-H "Authorization: Bearer lEGiH4LXskI0eil42HhLKWWIg1OpZgipdaN7t87sXDLxyk4Y6hs5HOKS3hxp" \
https://prac.alexp007.ru/api/apartment/1

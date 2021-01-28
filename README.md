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

curl -v -d '{
"name":"MAlex",
"surname": "Panteleev",
"password": "mYSecre34_",
"password_confirmation": "mYSecre34_"
}' \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-H "Authorization: Bearer GB9meoGcs3yvwwQ7MY0xKGiNSoJnzh4UYxERJGHXd4AunW5uYnwfwVSWPVTt" \
https://prac.alexp007.ru/update

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
-H "Authorization: Bearer Cyo5zZEj95K8sHq4ObYvbnEftMGC6UkjiB2OrFOZNvd3nVrhdnaD2YBJLZgE" \
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
-H "Authorization: Bearer Cyo5zZEj95K8sHq4ObYvbnEftMGC6UkjiB2OrFOZNvd3nVrhdnaD2YBJLZgE" \
https://prac.alexp007.ru/api/apartment/1

curl \
-H "Accept: application/json" \
-H "Authorization: Bearer Cyo5zZEj95K8sHq4ObYvbnEftMGC6UkjiB2OrFOZNvd3nVrhdnaD2YBJLZgE" \
-F "image=@/Users/alexanderpanteleev/Desktop/web/images/1.jpg" \
https://prac.alexp007.ru/api/apartment/3/image

curl -v \
-H "Accept: application/json" \
-H "Authorization: Bearer Cyo5zZEj95K8sHq4ObYvbnEftMGC6UkjiB2OrFOZNvd3nVrhdnaD2YBJLZgE" \
https://prac.alexp007.ru/api/apartment/3

curl -v -X DELETE \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-H "Authorization: Bearer Cyo5zZEj95K8sHq4ObYvbnEftMGC6UkjiB2OrFOZNvd3nVrhdnaD2YBJLZgE" \
https://prac.alexp007.ru/api/apartment/3

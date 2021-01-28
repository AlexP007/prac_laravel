# prac_laravel
practice project course for specialist

### Routes and requests

### User

*new*

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

*update*

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

*login*

curl -v -d '{
	"email": "alex@mail.ru",
	"password": "mYSecre34_"
}' \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
https://prac.alexp007.ru/login

*logout*

curl -v -d "name:alex" -H "Authorization: Bearer MgGt4KwA6op3aeMg7COahx74wuIhZTTuEI9vIwIstqDNK6uN0QExIcxvmoqd" https://prac.alexp007.ru/logout

## Apartments

*new*

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
https://prac.alexp007.ru/api/apartments

*update*

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
https://prac.alexp007.ru/api/apartments/1

*upload image*

curl \
-H "Accept: application/json" \
-H "Authorization: Bearer Cyo5zZEj95K8sHq4ObYvbnEftMGC6UkjiB2OrFOZNvd3nVrhdnaD2YBJLZgE" \
-F "image=@/Users/alexanderpanteleev/Desktop/web/images/1.jpg" \
https://prac.alexp007.ru/api/apartments/3/image

*one*

curl -v \
-H "Accept: application/json" \
-H "Authorization: Bearer Cyo5zZEj95K8sHq4ObYvbnEftMGC6UkjiB2OrFOZNvd3nVrhdnaD2YBJLZgE" \
https://prac.alexp007.ru/api/apartments/3

*all to user*

curl -v \
-H "Accept: application/json" \
-H "Authorization: Bearer NUBKkcoKOYVGVX72NXAGaLvVOoDMIskQFN1gh471wr9QnvWvi3HE3iKoq5zV" \
https://prac.alexp007.ru/api/apartments

*delete*

curl -v -X DELETE \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-H "Authorization: Bearer Cyo5zZEj95K8sHq4ObYvbnEftMGC6UkjiB2OrFOZNvd3nVrhdnaD2YBJLZgE" \
https://prac.alexp007.ru/api/apartments/3

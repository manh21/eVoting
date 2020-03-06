# eVoting

Aplikasi ini dibuat untuk meningkatkan kesadaran akan pentingnya menggunakan hak pilih kita dalam demokrasi di dunia yang modern ini.

# Server Requierment

PHP version 7.3 or newer

Database mySQL PHPMYADMIN

# Instalation

- ekstrak file eVoting ke dalam folder htdocs
- buat database baru dengan nama **evoting**
- import file **evoting.sql** ke database evoting yang sudah dibuat tadi
- **localhost/admin** untuk login ke dalam panel admin

# Setting Database

- Buat database evoting
- import file **evoting.sql** ke database evoting

# User

**Administrator**'

```
localhost/admin
E-mail: admin@admin.com
Password: password
```

**User Pemilih**

```
localhost
Username: 123123
Password: 123123
```

# API

API hanya untuk User Pemilih

API Default Settings:

```
/**
* Request Header Name
*/
protected $token_header = ['authorization', 'Authorization'];

/**
* Token Expire Time
* ----------------------
* ( 1 Day ) : 60 * 60 * 24 = 86400
* ( 1 Hour ) : 60 * 60 = 3600
*/
protected $token_expire_time =  86400;
```

### Configuration

application/config/jwt.php
Rubah JWT Secure Key

```
/*
|--------------------------------------------------------------------------
| JWT Secure Key
|--------------------------------------------------------------------------
*/
$config['jwt_key'] = "Change This";
```

JWT Algorithm Type Options

```
/*
|--------------------------------------------------------------------------
| JWT Algorithm Type
|--------------------------------------------------------------------------
*/
$config['jwt_algorithm'] = 'HS256';
```

Supported JWT Algorithm:

1. HS256
2. HS384
3. HS512

### Login

```
@param: username
@param: password
--------------------------
@method : POST
@link: localhost/evoting/api/users/login
```

Response:

```
{
    "status": true,
    "data": {
        "userid": "7",
        "nama": "DF",
        "status": "Sudah Memilih",
        "aktif": "1",
        "level": "siswa",
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjciLCJuYW1hIjoiREYiLCJ1c2VybmFtZSI6IjMzMzMiLCJzdGF0dXMiOiJTdWRhaCBNZW1pbGloIiwiYWt0aWYiOiIxIiwibGV2ZWwiOiJzaXN3YSIsInRpbWUiOjE1ODMxOTk2NTF9.j5rJawQF6vxo6xtEWjV2lAnYSl9mbQe110qijlCPxXw"
    },
    "message": "User login successful"
}
```

### Data Kandidat

```
@method : GET
@link: localhost/evoting/api/vote/kandidat
----------------------------------
Use token:
*Authoriztion = Token*
```

Response:

```
{
    "status": true,
    "data": {
        "kandidat_data": [
            {
                "idkandidat": "6",
                "organisasi": "OSIS",
                "nama": "OSMANSA",
                "nourut": "01",
                "jumlahsuara": "2",
                "visi": "<p>OSMANSA</p>",
                "misi": "<p>OSMANSA</p>",
                "foto": "OSMASA.jpg",
                "status": "1",
                "filefoto": "localhost/assets/uploads/kandidat/OSMASA.jpg"
            },
            {
                "idkandidat": "7",
                "organisasi": "MPK",
                "nama": "MPK",
                "nourut": "02",
                "jumlahsuara": "0",
                "visi": "<p>MPK</p>",
                "misi": "<p>MPK</p>",
                "foto": "MPK_VEC.png",
                "status": "1",
                "filefoto": "localhost/assets/uploads/kandidat/MPK_VEC.jpg"
            }
        ]
    },
    "message": "Request successful"
}
```

### Vote

```
@param: idkandidat
@param: idpemilih
--------------------------
@method : POST
@link: localhost/evoting/api/user/login
----------------------------------
Use token:
*Authoriztion = Token*
```

Response:

```
{
    "status": true  ,
    "message": "Vote successfull"
}
```

Jika ada masukan untuk project ini silahkan gunakan fitur issues di github

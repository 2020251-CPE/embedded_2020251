# embedded_2020251

## Instructions
**To Deploy in 000webhost.com by Yourself**
> - Copy all of the files (except .gitignore) to the "public_html" of your file manager
> - Use Postman to specific URLs of the files (well in theory, i haven't tried it yet lol)

## TO Test API:
### GET REQUEST with postman 
> - Put "https://embedded-2020251.000webhostapp.com/api/readAll.php" to the browser or Postman URL
> - Press Send

### POST RESUEST with postman
> - Put "https://embedded-2020251.000webhostapp.com/api/addOne.php"
to the Postman URL 
> - Configure it to POST REQUEST
> - create a raw JSON Body with the following format:
{
    "firstname": "Johnny",
    "lastname": "Johnson",
    "address": "Ohio",
    "gender": "Male",
    "number": "09772577170",
    "age": "54"
}
> - Press Send


_Credits to: https://github.com/ShadipBanik/Rest-apifor the original Source Code_

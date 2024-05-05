<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCra3nOT8dDv0eJdkjrSFvs34V6KpZ-YSo&libraries=places"></script>
</head>
<body>
    <script type="module">
        let res1 = await fetch("https://maps.googleapis.com/maps/api/geocode/json?address=24%20Sussex%20Drive%20Ottawa%20ON&key=AIzaSyCra3nOT8dDv0eJdkjrSFvs34V6KpZ-YSo")
        .then(res=>res.json())
        .then(res=>res.results[0].geometry.location);

        const url_enc = encodeURI("Mariahilfer Straße 56, Wien, Österreich");
        let res2 = await fetch(`https://maps.googleapis.com/maps/api/geocode/json?address=${url_enc}&key=AIzaSyCra3nOT8dDv0eJdkjrSFvs34V6KpZ-YSo`)
        .then(res=>res.json())
        .then(res=>res.results[0].geometry.location);
       
        const a = res1.lat - res2.lat;
        const b = res1.lng - res2.lng;
        const dist = Math.sqrt( a*a + b*b );
        console.log(dist);
    </script>
</body>
</html>
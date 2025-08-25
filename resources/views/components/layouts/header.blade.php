<!DOCTYPE html>
<html lang="en">

@props([
    'title' => ''
])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event - {{$title}}</title>

    <!--====== Bootstrap CSS ======-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!--====== Lineicons CSS ======-->
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />

    <!--====== Components Style css ======-->
    <link rel="stylesheet" href="https://cdn.ayroui.com/1.0/css/starter.css" />

    <link rel="stylesheet" href="{{ asset('storage/css/app.css')  }}">

    <!--====== Toast css ======-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!--====== International phone css ======-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/css/intlTelInput.css">

</head>

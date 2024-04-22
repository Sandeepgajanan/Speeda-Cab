<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <title>Speedaa-Cab</title>
</head>

<body>

    <header class="bg-nav">
        <div class="flex justify-between">
            <div class="p-1 mx-3 inline-flex items-center">
                <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                <h1 class="text-white p-2">Logo</h1>
            </div>
            <div class="p-1 flex flex-row items-center">
                <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="./uploads/logo.png"
                    alt="">
                <p style="color: white"><-Admin Setting</p>
                        <div id="ProfileDropDown"
                            class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                            <ul class="list-reset">
                                <li><a href="changepassword.php"
                                        class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Change
                                        Password</a></li>
                                <li><a href="logout.php"
                                        class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a>
                                </li>
                            </ul>
                        </div>
            </div>
        </div>
    </header>
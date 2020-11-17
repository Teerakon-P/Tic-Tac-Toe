# Tic-Tac-Toe
- Tic Tac Toe Game made in Laravel 

# Install

$ git clone https://github.com/Teerakon-P/Tic-Tac-Toe.git
  
$ cd Tic-Tac-Toe

$ composer install

$ composer artisan key:generate

$ php artisan serve

# How to play
- เข้าไปที่ URL: http://127.0.0.1:8000/ 
- เลือกขนาดตารางและ ผู้เล่น กด START
- ในหน้า PlayGame จะมีข้อความเเสดงว่าเป็นตาของใคร 
- กดไปที่เครื่องหมาย ? เพื่อเลือกช่องที่จะลง
- เมื่อเล่นจนจบเกม จะมีข้อความแสดงว่าใครชนะหรือเสมอ และมีปุ่ม NewGame แสดง

# ไฟล์หลัก
app\Http\Controllers\ApiController.php

app\Http\Controllers\HomeController.php

resources\views\layout\master.blade.php

resources\views\playGame.blade.php

resources\views\startGame.blade.php

routes\web.php



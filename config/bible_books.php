<?php

return [
    /*
    
|--------------------------------------------------------------------------
    | Bible Books Mapping
    
|--------------------------------------------------------------------------
    |
    | Maps Vietnamese book names to English names, Bolls.life API IDs,
    | and testament classification.
    |
    | Structure:
    | 'Vietnamese Name' => [
    |     'english' => 'English Name',
    |     'id' => Bolls API Book ID,
    |     'testament' => 'old' or 'new'
    | ]
    |
    */

    // OLD TESTAMENT - CỰU ƯỚC (39 books)
    // Torah / Pentateuch - Ngũ Kinh
    'Sáng Thế Ký' => ['english' => 'Genesis', 'id' => 1, 'testament' => 'old'],
    'Xuất Ai Cập Ký' => ['english' => 'Exodus', 'id' => 2, 'testament' => 'old'],
    'Lê-vi Ký' => ['english' => 'Leviticus', 'id' => 3, 'testament' => 'old'],
    'Dân Số Ký' => ['english' => 'Numbers', 'id' => 4, 'testament' => 'old'],
    'Phục Truyền Luật Lệ Ký' => ['english' => 'Deuteronomy', 'id' => 5, 'testament' => 'old'],

    // Historical Books - Sách Lịch Sử
    'Giô-suê' => ['english' => 'Joshua', 'id' => 6, 'testament' => 'old'],
    'Các Quan Xét' => ['english' => 'Judges', 'id' => 7, 'testament' => 'old'],
    'Ru-tơ' => ['english' => 'Ruth', 'id' => 8, 'testament' => 'old'],
    '1 Sa-mu-ên' => ['english' => '1 Samuel', 'id' => 9, 'testament' => 'old'],
    '2 Sa-mu-ên' => ['english' => '2 Samuel', 'id' => 10, 'testament' => 'old'],
    '1 Các Vua' => ['english' => '1 Kings', 'id' => 11, 'testament' => 'old'],
    '2 Các Vua' => ['english' => '2 Kings', 'id' => 12, 'testament' => 'old'],
    '1 Sử Ký' => ['english' => '1 Chronicles', 'id' => 13, 'testament' => 'old'],
    '2 Sử Ký' => ['english' => '2 Chronicles', 'id' => 14, 'testament' => 'old'],
    'Ê-xơ-ra' => ['english' => 'Ezra', 'id' => 15, 'testament' => 'old'],
    'Nê-hê-mi' => ['english' => 'Nehemiah', 'id' => 16, 'testament' => 'old'],
    'Ê-xơ-tê' => ['english' => 'Esther', 'id' => 17, 'testament' => 'old'],

    // Wisdom Books - Sách Khôn Ngoan
    'Gióp' => ['english' => 'Job', 'id' => 18, 'testament' => 'old'],
    'Thi Thiên' => ['english' => 'Psalms', 'id' => 19, 'testament' => 'old'],
    'Châm Ngôn' => ['english' => 'Proverbs', 'id' => 20, 'testament' => 'old'],
    'Truyền Đạo' => ['english' => 'Ecclesiastes', 'id' => 21, 'testament' => 'old'],
    'Nhã Ca' => ['english' => 'Song of Solomon', 'id' => 22, 'testament' => 'old'],

    // Major Prophets - Tiên tri Lớn
    'Ê-sai' => ['english' => 'Isaiah', 'id' => 23, 'testament' => 'old'],
    'Giê-rê-mi' => ['english' => 'Jeremiah', 'id' => 24, 'testament' => 'old'],
    'Ca Thương' => ['english' => 'Lamentations', 'id' => 25, 'testament' => 'old'],
    'Ê-xê-chi-ên' => ['english' => 'Ezekiel', 'id' => 26, 'testament' => 'old'],
    'Đa-ni-ên' => ['english' => 'Daniel', 'id' => 27, 'testament' => 'old'],

    // Minor Prophets - Tiên tri Nhỏ
    'Ô-sê' => ['english' => 'Hosea', 'id' => 28, 'testament' => 'old'],
    'Giô-ên' => ['english' => 'Joel', 'id' => 29, 'testament' => 'old'],
    'A-mốt' => ['english' => 'Amos', 'id' => 30, 'testament' => 'old'],
    'Áp-đia' => ['english' => 'Obadiah', 'id' => 31, 'testament' => 'old'],
    'Giô-na' => ['english' => 'Jonah', 'id' => 32, 'testament' => 'old'],
    'Mi-chê' => ['english' => 'Micah', 'id' => 33, 'testament' => 'old'],
    'Na-hum' => ['english' => 'Nahum', 'id' => 34, 'testament' => 'old'],
    'Ha-ba-cúc' => ['english' => 'Habakkuk', 'id' => 35, 'testament' => 'old'],
    'Sô-phô-ni' => ['english' => 'Zephaniah', 'id' => 36, 'testament' => 'old'],
    'A-ghê' => ['english' => 'Haggai', 'id' => 37, 'testament' => 'old'],
    'Xa-cha-ri' => ['english' => 'Zechariah', 'id' => 38, 'testament' => 'old'],
    'Ma-la-chi' => ['english' => 'Malachi', 'id' => 39, 'testament' => 'old'],

    // NEW TESTAMENT - TÂN ƯỚC (27 books)
    // Gospels - Phúc Âm
    'Ma-thi-ơ' => ['english' => 'Matthew', 'id' => 40, 'testament' => 'new'],
    'Mác' => ['english' => 'Mark', 'id' => 41, 'testament' => 'new'],
    'Lu-ca' => ['english' => 'Luke', 'id' => 42, 'testament' => 'new'],
    'Giăng' => ['english' => 'John', 'id' => 43, 'testament' => 'new'],

    // Acts
    'Công Vụ Các Sứ Đồ' => ['english' => 'Acts', 'id' => 44, 'testament' => 'new'],

    // Pauline Epistles - Thư của Phao-lô
    'Rô-ma' => ['english' => 'Romans', 'id' => 45, 'testament' => 'new'],
    '1 Cô-rinh-tô' => ['english' => '1 Corinthians', 'id' => 46, 'testament' => 'new'],
    '2 Cô-rinh-tô' => ['english' => '2 Corinthians', 'id' => 47, 'testament' => 'new'],
    'Ga-la-ti' => ['english' => 'Galatians', 'id' => 48, 'testament' => 'new'],
    'Ê-phê-sô' => ['english' => 'Ephesians', 'id' => 49, 'testament' => 'new'],
    'Phi-líp' => ['english' => 'Philippians', 'id' => 50, 'testament' => 'new'],
    'Cô-lô-se' => ['english' => 'Colossians', 'id' => 51, 'testament' => 'new'],
    '1 Tê-sa-lô-ni-ca' => ['english' => '1 Thessalonians', 'id' => 52, 'testament' => 'new'],
    '2 Tê-sa-lô-ni-ca' => ['english' => '2 Thessalonians', 'id' => 53, 'testament' => 'new'],
    '1 Ti-mô-thê' => ['english' => '1 Timothy', 'id' => 54, 'testament' => 'new'],
    '2 Ti-mô-thê' => ['english' => '2 Timothy', 'id' => 55, 'testament' => 'new'],
    'Tít' => ['english' => 'Titus', 'id' => 56, 'testament' => 'new'],
    'Phi-lê-môn' => ['english' => 'Philemon', 'id' => 57, 'testament' => 'new'],

    // General Epistles - Thư Chung
    'Hê-bơ-rơ' => ['english' => 'Hebrews', 'id' => 58, 'testament' => 'new'],
    'Gia-cơ' => ['english' => 'James', 'id' => 59, 'testament' => 'new'],
    '1 Phi-e-rơ' => ['english' => '1 Peter', 'id' => 60, 'testament' => 'new'],
    '2 Phi-e-rơ' => ['english' => '2 Peter', 'id' => 61, 'testament' => 'new'],
    '1 Giăng' => ['english' => '1 John', 'id' => 62, 'testament' => 'new'],
    '2 Giăng' => ['english' => '2 John', 'id' => 63, 'testament' => 'new'],
    '3 Giăng' => ['english' => '3 John', 'id' => 64, 'testament' => 'new'],
    'Giu-đe' => ['english' => 'Jude', 'id' => 65, 'testament' => 'new'],

    // Apocalyptic
    'Khải Huyền' => ['english' => 'Revelation', 'id' => 66, 'testament' => 'new'],
];
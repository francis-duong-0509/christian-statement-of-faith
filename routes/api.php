<?php

use App\Http\Controllers\BlogPostViewController;
use Illuminate\Support\Facades\Route;

Route::post('/blog/{post}/view', [BlogPostViewController::class, 'store']);
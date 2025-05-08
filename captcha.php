<?php

require_once('vendor/autoload.php');
use SimpleCaptcha\Builder;
use SimpleCaptcha\Helpers\Mime;
session_start();
# Start session & store phrase in session,
# so you can check it after form submission

$captcha = Builder::create();
$captcha->distortion = false;
$captcha->noiseFactor = 3;
$captcha->applyNoise = false;
$captcha->maxLinesBehind = 1;
$captcha->maxLinesFront = 1;
$captcha->maxAngle = 2;
$captcha->textColor = '#ffffff';
//$captcha->distort = false;
//$builder->noiseFactor (int)

$_SESSION['phrase'] = $captcha->phrase;
# Render captcha image (using correct header)
header('Content-type: ' . Mime::fromExtension('png'));
$captcha->build()->output();

// $builder->phrase (string)
// Captcha phrase. Default: random, see buildPhrase()

// $builder->fonts (array)
// Paths to captcha fonts. Default: Font files inside fonts

// $builder->distort (bool)
// Whether to distort the image. Default: true

// $builder->interpolate (bool)
// Whether to interpolate the image. Default: true

// $builder->maxLinesBehind (int)
// Maximum number of lines behind the captcha phrase. Default: random

// $builder->maxLinesFront (int)
// Maximum number of lines in front of the captcha phrase. Default: random

// $builder->maxAngle (int)
// Maximum character angle. Default: 8

// $builder->maxOffset (int)
// Maximum character offset. Default: 5

// $builder->bgColor (array|string)
// Background color, either RGB values (array), HEX value or 'transparent' (string). Default: random

// $builder->lineColor (array|string)
// Line color RGB values (array) or HEX value (string)

// $builder->textColor (array|string)
// Text color RGB values (array) or HEX value (string)

// $builder->bgImage (string)
// Path to background image. Default: background fill, see bgColor

// $builder->applyEffects (bool)
// Whether to apply any effects. Default: true

// $builder->applyNoise (bool)
// Whether to apply background noise (using random letters). Default: true

// $builder->noiseFactor (int)
// Multiples of phrase length to be used for noise generation. Default: 2

// $builder->applyPostEffects (bool)
// Whether to apply post effects. Default: true

// $builder->applyScatterEffect (bool)
// Whether to enable scatter effect. Default: true

// $builder->randomizeFonts (bool)
// Whether to use random font for each symbol. Default: true

// Examples
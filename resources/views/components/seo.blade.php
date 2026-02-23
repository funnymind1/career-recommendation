@props([
    'title' => config('app.name', 'Career Recommendation'),
    'description' => 'Interactive career planning portal for students. Discover your path through expert assessments and internship tracking.',
    'image' => asset('images/og-image.jpg')
])

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ $image }}">

<!-- Generic -->
<meta name="keywords" content="career, recommendation, internship, students, quiz, assessment, skill tracking">
<meta name="author" content="Career Portal">

@extends('layouts.main')

@section('title', 'Панель управления')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Панель управления</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="empty-state" data-height="600">
                            <div class="empty-state-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h2>Добро пожаловать в панель управления!</h2>
                            <p class="lead">
                                Здесь будет отображаться статистика и аналитика вашего сайта.
                            </p>
                            <p class="mt-4">
                                Начните с создания контента:
                            </p>
                            <div class="mt-5">
                                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg mr-2 mb-2">
                                    <i class="fas fa-plus"></i> Создать пост
                                </a>
                                <a href="{{ route('categories.create') }}" class="btn btn-info btn-lg mr-2 mb-2">
                                    <i class="fas fa-folder-plus"></i> Добавить категорию
                                </a>
                                <a href="{{ route('videos.index') }}" class="btn btn-success btn-lg mr-2 mb-2">
                                    <i class="fas fa-video"></i> Управление видео
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layout.admin')

@section('content')
    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-1">
                    Career Guides
                </h2>

                <p class="text-muted mb-0">
                    Quản lý bài viết hướng nghiệp
                </p>
            </div>

            <button class="btn btn-primary px-4 rounded-pill shadow-sm" onclick="toggleAddForm()">

                <i class="fa fa-plus me-2"></i>
                Thêm bài viết
            </button>

        </div>

        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4">

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

            </div>
        @endif

        {{-- ADD FORM --}}
        <div class="card border-0 shadow rounded-4 mb-4" id="addForm" style="display:none;">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="fw-bold mb-1">
                            Thêm bài viết mới
                        </h4>

                        <p class="text-muted mb-0">
                            Tạo bài viết hướng nghiệp
                        </p>
                    </div>

                    <button type="button" class="btn btn-danger rounded-circle" onclick="toggleAddForm()">

                        <i class="fa fa-times"></i>

                    </button>

                </div>

                <form method="POST" action="/admin/careers/store" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        {{-- TITLE --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Tiêu đề
                            </label>

                            <input type="text" name="title" class="form-control rounded-3" required>

                        </div>

                        {{-- CATEGORY --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Danh mục
                            </label>

                            <select name="category_id" class="form-control rounded-3">

                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->category_id }}">
                                        {{ $cat->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        {{-- IMAGE --}}
                        <div class="col-md-12 mb-3">

                            <label class="form-label fw-semibold">
                                Thumbnail
                            </label>

                            <img id="preview" src="https://via.placeholder.com/1200x400"
                                class="img-fluid rounded-4 shadow-sm mb-3"
                                style="height:260px;
                                    width:100%;
                                    object-fit:cover;">

                            <input type="file" name="thumbnail" class="form-control rounded-3"
                                onchange="previewImage(event)">

                        </div>

                        {{-- SUMMARY --}}
                        <div class="col-md-12 mb-3">

                            <label class="form-label fw-semibold">
                                Tóm tắt
                            </label>

                            <textarea name="summary" rows="3" class="form-control rounded-3"></textarea>

                        </div>

                        {{-- CONTENT --}}
                        <div class="col-md-12 mb-3">

                            <label class="form-label fw-semibold">
                                Nội dung
                            </label>

                            <textarea name="content" rows="6" class="form-control rounded-3"></textarea>

                        </div>

                    </div>

                    <button class="btn btn-primary px-5 rounded-pill">

                        <i class="fa fa-save me-2"></i>
                        Lưu bài viết

                    </button>

                </form>

            </div>

        </div>

        {{-- LIST --}}
        <div class="row">

            @foreach ($careers as $guide)
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card border-0 shadow rounded-4 h-100 overflow-hidden">

                        {{-- IMAGE --}}
                        <div class="position-relative">

                            <img src="{{ $guide->thumbnail }}" class="w-100"
                                style="height:240px;
                                object-fit:cover;">

                            <span class="badge bg-primary position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill">

                                {{ $guide->category->name ?? '' }}

                            </span>

                        </div>

                        {{-- BODY --}}
                        <div class="card-body p-4">

                            <h5 class="fw-bold mb-3">

                                {{ $guide->title }}

                            </h5>

                            <p class="text-muted">

                                {{ $guide->summary }}

                            </p>

                            <hr>

                            {{-- UPDATE FORM --}}
                            <form method="POST" action="/admin/careers/update/{{ $guide->guide_id }}"
                                enctype="multipart/form-data">

                                @csrf

                                <div class="mb-2">

                                    <input type="text" name="title" value="{{ $guide->title }}"
                                        class="form-control rounded-3">

                                </div>

                                <div class="mb-2">

                                    <textarea name="summary" rows="3" class="form-control rounded-3">{{ $guide->summary }}</textarea>

                                </div>

                                <div class="mb-2">

                                    <textarea name="content" rows="4" class="form-control rounded-3">{{ $guide->content }}</textarea>

                                </div>

                                <div class="mb-2">

                                    <select name="category_id" class="form-control rounded-3">

                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->category_id }}"
                                                {{ $guide->category_id == $cat->category_id ? 'selected' : '' }}>

                                                {{ $cat->name }}

                                            </option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="mb-2">

                                    <select name="status" class="form-control rounded-3">

                                        <option value="1" {{ $guide->status == 1 ? 'selected' : '' }}>

                                            Active

                                        </option>

                                        <option value="0" {{ $guide->status == 0 ? 'selected' : '' }}>

                                            Hidden

                                        </option>

                                    </select>

                                </div>

                                <div class="mb-3">

                                    <input type="file" name="thumbnail" class="form-control rounded-3">

                                </div>

                                <button class="btn btn-warning w-100 rounded-pill mb-2">

                                    <i class="fa fa-pen me-2"></i>
                                    Cập nhật

                                </button>

                            </form>

                            {{-- DELETE --}}
                            <a href="/admin/careers/delete/{{ $guide->guide_id }}"
                                class="btn btn-danger w-100 rounded-pill" onclick="return confirm('Xóa bài viết này?')">

                                <i class="fa fa-trash me-2"></i>
                                Xóa

                            </a>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

    {{-- SCRIPT --}}
    <script>
        function toggleAddForm() {

            const form = document.getElementById('addForm');

            if (form.style.display === 'none') {

                form.style.display = 'block';

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });

            } else {

                form.style.display = 'none';
            }
        }

        function previewImage(event) {

            const reader = new FileReader();

            reader.onload = function() {

                document.getElementById('preview').src =
                    reader.result;
            }

            reader.readAsDataURL(
                event.target.files[0]
            );
        }
    </script>
@endsection

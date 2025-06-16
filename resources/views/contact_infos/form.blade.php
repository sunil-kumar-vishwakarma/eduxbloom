<div class="mb-3">
    <label>Icon Class (FontAwesome)</label>
    <input type="text" name="icon_class" placeholder="For ex: fas fa-globe fa-fw" class="form-control" value="{{ old('icon_class', $contact->icon_class ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $contact->title ?? '') }}" required>
</div>

{{-- <div class="mb-3">
    <label>Subtitle (optional)</label>
    <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $contact->subtitle ?? '') }}">
</div> --}}

<div class="mb-3">
    <label>Link (mailto: / tel: / https://)</label>
    <input type="text" name="link" class="form-control" value="{{ old('link', $contact->link ?? '') }}">
</div>

<div class="mb-3">
    <label>Link Text</label>
    <input type="text" name="link_text" class="form-control" value="{{ old('link_text', $contact->link_text ?? '') }}">
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $contact->description ?? '') }}</textarea>
</div>

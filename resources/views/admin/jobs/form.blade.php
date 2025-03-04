<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ isset($job) ? $job->title : '' }}" required>
</div>
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control" required>{{ isset($job) ? $job->description : '' }}</textarea>
</div>
<div class="mb-3">
    <label for="company" class="form-label">Company</label>
    <input type="text" name="company" id="company" class="form-control" value="{{ isset($job) ? $job->company : '' }}" required>
</div>
<div class="mb-3">
    <label for="location" class="form-label">Location</label>
    <input type="text" name="location" id="location" class="form-control" value="{{ isset($job) ? $job->location : '' }}" required>
</div>
<div class="mb-3">
    <label for="deadline" class="form-label">Deadline</label>
    <input type="date" name="deadline" id="deadline" class="form-control" value="{{ isset($job) ? $job->deadline : '' }}" required>
</div>
<div class="mb-3">
    <label for="application_link" class="form-label">Application Link</label>
    <input type="url" name="application_link" id="application_link" class="form-control" value="{{ isset($job) ? $job->application_link : '' }}">
</div>
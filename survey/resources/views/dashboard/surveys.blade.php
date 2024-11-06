@extends('dashboard.index') <!-- Adjust to match your actual layout file path -->

@section('content')
<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Surveys</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add New Survey
        </a>
    </div>

    <!-- Surveys Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Survey List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Question</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($surveys as $survey)
                        <tr>
                            <td>{{ $survey->id }}</td>
                            <td>
                                @foreach ($categories as $category)
                                    @if ($category->id == $survey->category_id)
                                        {{ $category->title }}
                                        @break
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $survey->question }}</td>
                            <td>{{ $survey->created_at->format('d M Y') }}</td>
                            <td>{{ $survey->updated_at->format('d M Y') }}</td>
                            {{-- select for changin survey status --}}
                            <td>
                                <select class="form-control" onchange="updateSurveyStatus({{ $survey->id }}, this.value)">
                                    <option value="active" {{ $survey->status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $survey->status == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </td>
                            <script>
                                function updateSurveyStatus(surveyId, status) {
                                    fetch(`/surveys/${surveyId}`, {
                                        method: 'PUT',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({ status: status === 'active' ? 1 : 0 })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            alert('Status updated successfully');
                                        } else {
                                            alert('Failed to update status');
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('An error occurred');
                                    });
                                }
                            </script>                            
                            <td>
                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

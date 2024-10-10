    @extends('layouts.app') 
    
    @section('content') 
    <div> 
        <!-- Isi Section --> 
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $user->nama ?? '') }}" required>
                            @foreach($errors->get('nama') as $message)
                                <div class="text-danger">{{ $message }}</div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="npm" class="form-label">NPM</label>
                            <input type="text" id="npm" name="npm" class="form-control" value="{{ old('npm', $user->npm ?? '') }}" required>
                            @foreach($errors->get('npm') as $message)
                                <div class="text-danger">{{ $message }}</div>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <div>
                                <label for="kelas" class="form-label">Kelas</label>
                                <select name="kelas_id" id="kelas_id" class="form-select" required>
                                <option value="" {{ old('kelas_id') == '' ? 'selected' : '' }}>-- Pilih Kelas --</option>
                                    @foreach($kelas as $kelasItem)
                                        <option value="{{$kelasItem->id}}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                                        {{$kelasItem->nama_kelas}}
                                        </option>
                                    @endforeach
                                </select>
                                @foreach($errors->get('kelas_id') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                
                </div> 
                
            </div>
        </div>
    </div>
    @endsection


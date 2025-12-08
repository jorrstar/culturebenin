@extends('layout')

@section('title', 'Mon Profil')

@section('content')

<style>
/* Container */
.profile-container { max-width: 980px; margin: 0 auto; }

/* Sections */
.panel {
  background:#fff; padding:20px; border-radius:10px; box-shadow:0 6px 20px rgba(15,23,42,0.06); margin-bottom:20px;
}

/* Headings */
.panel h3 { margin:0 0 12px; color:#0f1e54; font-size:18px; }

/* Inputs */
.input, select, textarea {
  width:100%; padding:10px 12px; border:1px solid #e5e7eb; border-radius:8px; font-size:14px;
  box-sizing:border-box;
}
.grid { display:grid; gap:16px; grid-template-columns: 1fr 1fr; }
.grid-full { display:block; }

/* Avatar */
.avatar-wrap { display:flex; gap:16px; align-items:center; }
.avatar-preview {
  width:110px; height:110px; border-radius:9999px; object-fit:cover; border:2px solid #eef2ff;
  box-shadow:0 6px 18px rgba(2,6,23,0.05);
}

/* Buttons */
.btn { display:inline-block; padding:10px 14px; border-radius:8px; text-decoration:none; font-weight:600; cursor:pointer; border:none; }
.btn-primary { background:#2563eb; color:#fff; }
.btn-ghost { background:transparent; color:#2563eb; border:1px solid #e6f0ff; }
.btn-danger { background:#dc2626; color:#fff; }

/* Small text */
.small { font-size:13px; color:#6b7280; }

/* Responsive */
@media (max-width:800px) {
  .grid { grid-template-columns: 1fr; }
  .avatar-preview { width:86px; height:86px; }
}
</style>

<div class="profile-container">

  <!-- Status messages -->
  @if(session('status'))
    <div class="panel" style="border-left:4px solid #10b981;">
      <p style="margin:0; color:#064e3b;">{{ session('status') }}</p>
    </div>
  @endif

  <!-- Profile info + avatar -->
  <div class="panel">
    <h3>Informations personnelles</h3>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
      @csrf

      <div style="display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
        <div class="avatar-wrap">
          <img id="avatarPreview" src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('storage/avatars/default.png') }}"
               alt="Avatar" class="avatar-preview">
        </div>

        <div style="flex:1; min-width:220px;">
          <label class="small">Changer la photo de profil</label><br>
          <input id="photoInput" type="file" name="photo" accept="image/*" class="input" />
          <p class="small" style="margin-top:6px;">Formats acceptés : jpg, jpeg, png, gif, webp, svg - max 5MB.</p>

          <div style="margin-top:10px;">
            <button type="submit" class="btn btn-primary">Enregistrer le profil</button>

            <button type="button" id="removeAvatarBtn" class="btn btn-ghost" style="margin-left:8px;">Supprimer la photo</button>
          </div>
        </div>
      </div>

      <hr style="margin:18px 0; border-color:#f1f5f9;">

      <div class="grid">
        <div>
          <label>Nom</label>
          <input class="input" type="text" name="nom" value="{{ old('nom', $user->nom) }}" required>
        </div>

        <div>
          <label>Prénom</label>
          <input class="input" type="text" name="prenom" value="{{ old('prenom', $user->prenom) }}">
        </div>

        <div>
          <label>Email</label>
          <input class="input" type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div>
          <label>Langue</label>
          <select class="input" name="id_langue">
            <option value="">-- Défaut --</option>
            @foreach(\App\Models\Langue::all() as $langue)
              <option value="{{ $langue->id_langue }}" @if($user->id_langue == $langue->id_langue) selected @endif>{{ $langue->nom_langue }}</option>
            @endforeach
          </select>
        </div>

      </div>

    </form>
  </div>

  <!-- Password -->
  <div class="panel">
    <h3>Changer le mot de passe</h3>

    <form method="POST" action="{{ route('profile.password') }}">
      @csrf

      <div class="grid">
        <div>
          <label>Mot de passe actuel</label>
          <input class="input" type="password" name="current_password" required>
        </div>

        <div>
          <label>Nouveau mot de passe</label>
          <input class="input" type="password" name="password" required>
        </div>

        <div style="grid-column:1 / -1;">
          <label>Confirmer le nouveau mot de passe</label>
          <input class="input" type="password" name="password_confirmation" required>
        </div>
      </div>

      <div style="margin-top:12px;">
        <button class="btn btn-primary">Mettre à jour le mot de passe</button>
      </div>
    </form>
  </div>

  <!-- Danger: delete account -->
  <div class="panel">
    <h3 style="color:#b91c1c;">Supprimer le compte</h3>
    <p class="small">Cette action est irréversible. Tous vos contenus et données seront supprimés.</p>

    <form method="POST" action="{{ route('profile.destroy') }}">
      @csrf
      @method('DELETE')

      <div style="margin-top:12px; display:flex; gap:12px; align-items:center; flex-wrap:wrap;">
        <input class="input" type="password" name="password" placeholder="Entrez votre mot de passe" style="max-width:320px;" required>
        <button class="btn btn-danger" type="submit">Supprimer mon compte</button>
      </div>
    </form>
  </div>

</div>

<script>
  // preview avatar before upload
  const photoInput = document.getElementById('photoInput');
  const avatarPreview = document.getElementById('avatarPreview');
  photoInput && photoInput.addEventListener('change', function(e){
    const f = e.target.files[0];
    if (!f) return;
    const url = URL.createObjectURL(f);
    avatarPreview.src = url;
  });

  // Remove avatar: call new endpoint via POST to profile.avatar-remove (we'll use form submission fallback)
  document.getElementById('removeAvatarBtn').addEventListener('click', function(){
    if (!confirm('Voulez-vous supprimer votre photo de profil ?')) return;

    // create dynamic form to call a removeAvatar route (we'll use profile.avatar route with a ?remove=1 flag)
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = "{{ route('profile.avatar') }}?remove=1";
    form.style.display = 'none';

    const token = document.createElement('input');
    token.type = 'hidden';
    token.name = '_token';
    token.value = "{{ csrf_token() }}";
    form.appendChild(token);

    // use method POST
    document.body.appendChild(form);
    form.submit();
  });
</script>

@endsection

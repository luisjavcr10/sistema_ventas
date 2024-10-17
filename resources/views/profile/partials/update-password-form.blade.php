<section>
    <header>
        <h2 class="h5 text-dark">
            {{ __('Actualizar contraseña') }}
        </h2>

        <p class="text-muted mt-2">
            {{ __('Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantenerla segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Contraseña actual') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
            @if($errors->updatePassword->get('current_password'))
                <div class="text-danger mt-1">
                    {{ implode(', ', $errors->updatePassword->get('current_password')) }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('Contraseña nueva') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
            @if($errors->updatePassword->get('password'))
                <div class="text-danger mt-1">
                    {{ implode(', ', $errors->updatePassword->get('password')) }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirma nueva contraseña') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
            @if($errors->updatePassword->get('password_confirmation'))
                <div class="text-danger mt-1">
                    {{ implode(', ', $errors->updatePassword->get('password_confirmation')) }}
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-muted small"
                >{{ __('Actualizado.') }}</p>
            @endif
        </div>
    </form>
</section>
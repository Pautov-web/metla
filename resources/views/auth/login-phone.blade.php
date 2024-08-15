<x-guest-layout>

        <form method="POST" action="{{ route('login.client.send') }}" class="form-phone">
            @csrf

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" x-text="phone_msg" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Send Code') }}
                </x-primary-button>
            </div>
        </form>
        <form method="POST" action="{{ route('login.client') }}" style="display: none;" id="form_code"  x-transition class="form">
            @csrf
            <div class="mt-4">
                <x-input-label for="code" :value="__('Code')" />
                <x-text-input id="code" class="block mt-1 w-full" type="number" name="code" required autocomplete="code" />
                <x-input-error :messages="$errors->get('code')" x-text="code_msg" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
        </form>
</x-guest-layout>

<!-- @ push('scripts') -->
    <script src="/js/client-auth.js?v={{ rand() }}"></script>
<!-- @ endpush -->

<!-- <script>
    function phoneLoginForm() {
        return {
            formData: {
                phone: '',
            },
            phone_msg: '',
            submitData() {
                this.phone_msg = ''
                fetch('{{ route('login.client.send') }}', {
                    method: 'POST',
                    headers: { 
                        'Content-Type': 'application/json',
                        'X-CSRF-Token' : '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(this.formData)
                })
                .then(response => {
                    renderList(response)
    
                })
                .then(data => console.log(data))

                // .then((response) => {
                //     this.open = true;
                //     console.log(response.json());
                //     // if(response.type == 'success')
                //     //     this.phone_msg = response.msg
                // })
                .catch(() => {
                    this.phone_msg = 'Ooops! Something went wrong!'
                })
            }
        }
    }
</script> -->
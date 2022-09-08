@extends('tenant.layouts.account.default')

@section('account.content')


    <div class="mt-5  overflow-x-auto md:mt-0 md:col-span-2 ">

            <table class="table-auto text-sm  divide-y divide-slate-100 w-full text-sm text-left text-gray-500 ">
                <thead class="w-full  text-sm bg-gray-50 rounded-md text-left text-gray-500 ">
                <tr>

                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="block text-sm dark:text-white font-medium leading-5 text-gray-700">Name</div>
                    </th>

                    <th class="px-2 first:pl-5  last:pr-5 py-3 whitespace-nowrap">
                        <div class="block text-sm dark:text-white font-medium leading-5 text-gray-700">Email</div>
                    </th>

                    <th class="px-2 first:pl-5  last:pr-5 py-3 whitespace-nowrap">
                        <div class="block text-sm dark:text-white font-medium leading-5 text-gray-700">Permission</div>
                    </th>

                    @if (tenant()->subscribed())
                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <a class="modal-open btn bg-indigo-600 hover:bg-indigo-700 text-white ml-3">
                            <i class='bx bxs-user-plus nav__icon '></i>
                            ADD
                        </a>
                    </th>
                        @else
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white disabled:border-slate-200 disabled:bg-slate-100 disabled:text-slate-400 disabled:cursor-not-allowed shadow-none" disabled>
                                <i class='bx bxs-user-plus nav__icon '></i>
                                ADD
                            </button>
                        </th>

                    @endif
                </tr>
                </thead>
                @foreach ($users as $user)
                <tbody  >
                <tr>
                    <td class="px-2 flex items-center first:pl-5 last:pr-5 py-3 whitespace-nowrap">

                            <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                <img class="rounded-full" src="/uploads/avatars/{{$user->avatar}}" width="40" height="40" alt="User 01" />
                            </div>
                            <div class="font-medium text-slate-800">{{$user->name}}</div>
                    </td>

                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-medium text-slate-800">{{$user->email}}</div>
                    </td>


                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        @if($user->is_admin)

                            <div class="text-xs inline-flex font-medium bg-emerald-100
                             rounded-full text-center px-2.5 py-1">
                                Admin
                            </div>
                        @else
                            <div class="text-xs inline-flex font-medium bg-yellow-100 text-pink-200-600 rounded-full text-center px-2.5 py-1">
                                User
                            </div>
                        @endif
                    </td>



                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                        <div class="space-x-4 flex flex-row">


                            <a href="{{route('tenant.account.team.edit', $user->id)}}" class="font-medium text-blue-600  hover:underline">
                                <i class=' table__icon bx bxs-edit'></i>
                            </a>

                            <div>
                                @if($user->is_admin)
                                @else
                                    <form action="{{route('tenant.account.team.destroy' , $user->id)}}" method="POST" class="text-red-500 hover:text-rose-600 rounded-full">
                                        @csrf
                                        @method('DELETE')
                                        <button>
                                            <i class='bx bx-trash-alt table__icon'></i>
                                        </button>
                                    </form>

                                @endif
                            </div>

                            <a href="{{route('tenant.account.team.view', $user->id)}}" class="text-rose-500 hover:text-rose-600 rounded-full">
                                <i class='bx bx-show-alt table__icon'></i>
                            </a>



                        </div>
                    </td>
                </tr>
                </tbody>
                @endforeach

            </table>

        <div class="mt-10 m-1 mx-4">
            {{$users->links()}}
        </div>
    </div>


    <!-- Modal Register Users -->
    <div class="modal opacity-0 transition-opacity ease-in duration-100 pointer-events-none fixed w-full h-full top-10 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container  bg-white  w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="p-1">

                <h3 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Add user to your team.</h3>

            </div>



            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                <form class="mt-8 space-y-6" action="{{route('tenant.account.team.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="remember" value="true">
                    <div class="-space-y-px">

                        <!-- Name -->
                        <div class="p-1 mt-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input placeholder="Personal name" id="name" type="text" name="name" value="{{ old('name', '') }}" required autofocus
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                            </div>
                            @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="p-1 mt-6">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input placeholder="Email address" id="email-address" name="email" type="email" value="{{ old('email-address', '') }}" autocomplete="email" required
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                            </div>
                            @error('email-address')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role -->

                        <div class="p-1 col-span-6 sm:col-span-5">
                            <label for="is_admin" class="block text-sm font-medium text-gray-700">Role</label>
                            <select name="is_admin" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="{{0}}">User</option>
                                <option value="{{1}}">Admin</option>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="p-1 mt-6">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input placeholder="Password" id="password" type="password" name="password" required autocomplete="new-password"
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                            </div>
                            @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirmation Password -->
                        <div class="p-1 mt-6">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Password Confirmation</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input placeholder="Password confirmation" id="password_confirmation" type="password" name="password_confirmation" required
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>

                            </div>
                            @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                     <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                         <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                         </svg>
                     </span>
                            Register
                        </button>
                    </div>
                </form>
            </div>
    </div>


@endsection

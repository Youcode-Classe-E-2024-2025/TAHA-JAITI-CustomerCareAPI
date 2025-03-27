import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';
import { User, Response } from '../../types/api';

const API_URL = import.meta.env.VITE_API_URL ?? 'http://localhost:8080/api/';

interface LoginCreds {
    email: string;
    password: string;
}

interface SignupCreds {
    name: string;
    email: string;
    password: string;
}

interface AuthData {
    user: User;
    token: string;
}

export const authApi = createApi({
    reducerPath: 'authApi',
    baseQuery: fetchBaseQuery({
        baseUrl: API_URL,
        prepareHeaders: (headers) => {
            const token = localStorage.getItem('token');
            if (token) {
                headers.set('Authorization', `Bearer ${token}`);
            }
            return headers;
        },
    }),
    tagTypes: ['Auth'],
    endpoints: (builder) => ({
        login: builder.mutation<Response<AuthData>, LoginCreds>({
            query: (creds) => ({
                url: 'auth/login',
                method: 'POST',
                body: creds,
            }),
            async onQueryStarted(_, { queryFulfilled }) {
                try {
                    const { data } = await queryFulfilled;
                    if (data.data) {
                        localStorage.setItem('token', data.data.token);
                        localStorage.setItem('user', JSON.stringify(data.data.user));
                    }
                } catch (err) {
                    console.error('Login error:', err);
                }
            },
            invalidatesTags: ['Auth'],
        }),
        signup: builder.mutation<Response<AuthData>, SignupCreds>({
            query: (creds) => ({
                url: 'auth/register',
                method: 'POST',
                body: creds,
            }),
            async onQueryStarted(_, { queryFulfilled }) {
                try {
                    const { data } = await queryFulfilled;
                    if (data.data) {
                        localStorage.setItem('token', data.data.token);
                        localStorage.setItem('user', JSON.stringify(data.data.user));
                    }
                } catch (err) {
                    console.error('Signup error:', err);
                }
            },
            invalidatesTags: ['Auth'],
        }),
        logout: builder.mutation<void, void>({
            query: () => ({
                url: 'auth/logout',
                method: 'POST',
            }),
            async onQueryStarted(_, { queryFulfilled }) {
                try {
                    await queryFulfilled;
                    localStorage.removeItem('token');
                    localStorage.removeItem('user');
                } catch (err) {
                    console.error('Logout error:', err);
                }
            },
            invalidatesTags: ['Auth'],
        }),
    }),
});

export const {
    useLoginMutation,
    useSignupMutation,
    useLogoutMutation,
} = authApi;

export const selectUser = () => {
    const user = localStorage.getItem('user');
    return user ? JSON.parse(user) : null;
  };
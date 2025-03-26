import { createSlice, createAsyncThunk, PayloadAction } from '@reduxjs/toolkit';
import { AuthState } from './../../types/state';
import authService from '../../services/authService';



const initialState: AuthState = {
    user: null,
    token: localStorage.getItem("token") || null,
    loading: false,
    error: null,
}

export const login = createAsyncThunk("auth/login",
    async (creds: { email: string, password: string }, { rejectWithValue }) => {
        try {
            const response = await authService.login(creds);
            if (response.data && response.data.data) {
                localStorage.setItem("token", response.data.data);
            }
            return response.data;
        } catch (err: any) {
            return rejectWithValue(err?.response?.data?.message || 'Login failed');
        }
    }
);

export const logout = createAsyncThunk("auth/logout", async () => {
    localStorage.removeItem("token");
    return null;
});


import { createSlice, createAsyncThunk, PayloadAction } from '@reduxjs/toolkit';
import { AuthState } from './../../types/state';
import authService, { LoginData } from '../../services/authService';

const initialState: AuthState = {
    user: null,
    token: localStorage.getItem("token") || null,
    loading: false,
    error: null,
};

export const login = createAsyncThunk<LoginData, { email: string, password: string }>(
    "auth/login",
    async (creds, { rejectWithValue }) => {
        try {
            const response = await authService.login(creds);
            
            if (!response.data || !response.data.data) {
                return rejectWithValue('Login failed: Invalid response');
            }
            
            localStorage.setItem("token", response.data.data.token);
            return response.data.data;
        } catch (err: any) {
            return rejectWithValue(err?.response?.data?.message || 'Login failed');
        }
    }
);

export const signup = createAsyncThunk<LoginData, {name:string ,email: string, password: string }>(
    "auth/signup",
    async (creds, { rejectWithValue }) => {
        try {
            const response = await authService.register(creds);
            
            if (!response.data || !response.data.data) {
                return rejectWithValue('Register failed: Invalid response');
            }
            
            localStorage.setItem("token", response.data.data.token);
            return response.data.data;
        } catch (err: any) {
            return rejectWithValue(err?.response?.data?.message || 'Register failed');
        }
    }
);

export const logout = createAsyncThunk("auth/logout", async () => {
    localStorage.removeItem("token");
    return null;
});

const authSlice = createSlice({
    name: "auth",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder
            .addCase(login.pending, (state) => {
                state.loading = true;
                state.error = null;
            })
            .addCase(login.fulfilled, (state, action: PayloadAction<LoginData>) => {
                state.loading = false;
                state.token = action.payload.token;
                state.user = action.payload.user;
            })
            .addCase(login.rejected, (state, action) => {
                state.loading = false;
                state.error = action.payload as string;
            })
            .addCase(logout.fulfilled, (state) => {
                state.user = null;
                state.token = null;
            })
            .addCase(signup.pending, (state) => {
                state.loading = true;
                state.error = null;
            })
            .addCase(signup.fulfilled, (state, action: PayloadAction<LoginData>) => {
                state.loading = false;
                state.token = action.payload.token;
                state.user = action.payload.user;
            })
            .addCase(signup.rejected, (state, action) => {
                state.loading = false;
                state.error = action.payload as string;
            });
    }
});

export default authSlice.reducer;

import { createSlice, createAsyncThunk, PayloadAction } from '@reduxjs/toolkit';
import api from '../../api/axios';
import { AuthState } from './../../types/state';



const initialState: AuthState = {
    user: null,
    token: localStorage.getItem("token") || null,
    loading: false,
    error: null,
}

// export const login = createAsyncThunk("auth/login", 
//     async(creds: {email: string, password: string}, {rejectWithValue}) => {
//         try {
//             const response = await api.post("/auth/login", creds);
//             localStorage.setItem("token", response.data.token);
//         } catch (err: unknown){

//         }
//     }
// )

import api from "../api/axios";
import { Response } from "../types/api";


interface creds {
    name: string;
    email: string;
    password: string;
}

const login = (creds: Pick<creds, 'email' | 'password'>) => api.post<Response<string>>('/auth/login', creds);
const register = (creds: creds) => api.post<Response<string>>('/auth/register', creds);
const logout = () => api.post<Response<null>>('/auth/logout');

const authService = {
    login,
    register,
    logout
}

export default authService;
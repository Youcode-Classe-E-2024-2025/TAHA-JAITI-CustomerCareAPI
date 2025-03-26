import api from "../api/axios";
import { Response, User } from "../types/api";


interface creds {
    name: string;
    email: string;
    password: string;
}

export interface LoginData {
    token: string,
    user: User
}

const login = (creds: Pick<creds, 'email' | 'password'>) => api.post<Response<LoginData>>('/auth/login', creds);
const register = (creds: creds) => api.post<Response<string>>('/auth/register', creds);
const logout = () => api.post<Response<null>>('/auth/logout');

const authService = {
    login,
    register,
    logout
}

export default authService;
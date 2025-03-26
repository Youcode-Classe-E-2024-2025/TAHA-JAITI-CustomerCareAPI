import api from "../api/axios";


interface creds {
    name: string;
    email: string;
    password: string;
}

const login = (creds: Pick<creds, 'email' | 'password'>) => api.post('/auth/login', creds);
const register = (creds: creds) => api.post('/auth/register', creds);
const logout = () => api.post('/auth/logout');

const authService = {
    login,
    register,
    logout
}

export default authService;
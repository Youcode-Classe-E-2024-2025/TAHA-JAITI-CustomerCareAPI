import { User } from './api';

export interface AuthState {
    user: User | null;
    token: string | null;
    loading: boolean;
    error: string | null;
}
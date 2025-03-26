export interface Response<T> {
    status: 'success' | 'error';
    message: string;
    data?: T | null;
}

export interface User {
    id: number
    name: string
    email: string
    role: "agent" | "user"
    created_at: string
    updated_at: string
}
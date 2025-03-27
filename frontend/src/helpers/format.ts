import { ApiErr } from "../types/api"

export const formatErr = (error) => {
    return error && 'data' in error ? (error as ApiErr).data?.message : 'An error occurred.'
}
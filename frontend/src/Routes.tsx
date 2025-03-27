import { createBrowserRouter, RouteObject } from 'react-router';
import { Suspense, lazy } from 'react';
import Layout from './layouts/Layout';
import Loading from './components/Loading';

const Index = lazy(() => import('./pages/Index'));
const Login = lazy(() => import('./pages/Login'));
const Signup = lazy(() => import('./pages/Signup'));

const routes: RouteObject[] = [
    {
        path: '/',
        element: <Layout />,
        children: [
            {
                index: true,
                element: (
                    <Suspense fallback={<Loading />}>
                        <Index />
                    </Suspense>
                ),
            },
        ],
    },
    {
        path: 'login',
        element: (
            <Suspense fallback={<Loading />}>
                <Login />
            </Suspense>
        ),
    },
    {
        path: 'signup',
        element: (
            <Suspense fallback={<Loading />}>
                <Signup />
            </Suspense>
        ),
    },
];

export const router = createBrowserRouter(routes);
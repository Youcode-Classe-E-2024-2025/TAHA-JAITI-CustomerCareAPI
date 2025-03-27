import React from 'react';
import ReactDOM from 'react-dom';
import { FaSpinner } from 'react-icons/fa';

interface LoadingProps {
    size?: 'sm' | 'md' | 'lg';
    color?: string;
    message?: string;
}

const Loading: React.FC<LoadingProps> = ({
    size = 'md',
    color = 'amber-500',
    message,
}) => {
    const sizeStyles = {
        sm: 'h-6 w-6 border-2',
        md: 'h-10 w-10 border-4',
        lg: 'h-16 w-16 border-6',
    };

    return ReactDOM.createPortal(
        <div
            className="fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-50 transition-opacity duration-300"
            role="status"
            aria-label="Loading"
        >
            <div className="flex flex-col items-center gap-4">
                <FaSpinner
                    className={`animate-spin text-${color} ${sizeStyles[size]} border-${color} border-t-transparent rounded-full`}
                    aria-hidden="true"
                />
                {message && (
                    <p className="text-white text-sm font-medium animate-pulse">
                        {message}
                    </p>
                )}
            </div>
        </div>,
        document.body
    );
};

export default Loading;
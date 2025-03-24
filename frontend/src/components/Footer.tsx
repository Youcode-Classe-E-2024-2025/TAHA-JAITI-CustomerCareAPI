import type React from "react"
import { Ticket } from "lucide-react"

const Footer: React.FC = () => {
  return (
    <footer className="bg-black-200 py-4">
      <div className="container mx-auto px-4 flex flex-col items-center justify-center">
        <div className="flex justify-between gap-2 items-center">
          <Ticket />
          <span className="text-lg font-bold">DimaLeek</span>
        </div>
        <span className="text-sm">&copy; {new Date().getFullYear()} All rights reserved</span>
      </div>
    </footer>
  )
}

export default Footer
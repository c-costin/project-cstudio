#!/bin/bash

# Open new terminal for Backend Server
gnome-terminal --tab -- bash -c 'cd backend && php -S localhost:8000 -t public'

# Open new terminal for Frontend Server
gnome-terminal --tab -- bash -c 'cd frontend && pnpm run dev'
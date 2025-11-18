#!/bin/bash

# Christian Faith Web Docker Cleanup Script
# This script removes all Docker containers, volumes, and images related to the Christian Faith Web project

set -e

echo "🧹 Christian Faith Web Docker Cleanup Script"
echo "================================="
echo "⚠️  WARNING: This will remove all Christian Faith Web Docker resources including:"
echo "   - All containers (stopped and running)"
echo "   - All volumes (including data volumes)"
echo "   - All images"
echo "   - All networks"
echo ""
echo "⚠️  This action is IRREVERSIBLE and will DELETE ALL DATA!"
echo ""

# Prompt for confirmation
read -p "Are you sure you want to continue? (type 'yes' to confirm): " -r
echo
if [[ ! $REPLY =~ ^[Yy]es$ ]]; then
    echo "❌ Cleanup cancelled."
    exit 1
fi

# Colors for output
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Function to stop and remove containers
cleanup_containers() {
    echo -e "${BLUE}🐳 Stopping and removing Christian Faith Web containers...${NC}"

    # Get all Christian Faith Web containers (running and stopped)
    CONTAINERS=$(docker ps -a --filter "name=christian-faith-web" --format "{{.Names}}" 2>/dev/null || true)

    if [ -n "$CONTAINERS" ]; then
        echo "Found containers:"
        echo "$CONTAINERS"

        # Stop running containers
        RUNNING=$(docker ps --filter "name=christian-faith-web" --format "{{.Names}}" 2>/dev/null || true)
        if [ -n "$RUNNING" ]; then
            echo "Stopping running containers..."
            echo "$RUNNING" | xargs -r docker stop
        fi

        # Remove all containers
        echo "Removing containers..."
        echo "$CONTAINERS" | xargs -r docker rm -f
        echo -e "${GREEN}✅ Containers removed${NC}"
    else
        echo "No Christian Faith Web containers found."
    fi
}

# Function to remove volumes
cleanup_volumes() {
    echo -e "${BLUE}💾 Removing Christian Faith Web volumes...${NC}"

    # Get all Christian Faith Web volumes
    VOLUMES=$(docker volume ls --filter "name=christian-faith-web" --format "{{.Name}}" 2>/dev/null || true)

    if [ -n "$VOLUMES" ]; then
        echo "Found volumes:"
        echo "$VOLUMES"
        echo "Removing volumes..."
        echo "$VOLUMES" | xargs -r docker volume rm
        echo -e "${GREEN}✅ Volumes removed${NC}"
    else
        echo "No Christian Faith Web volumes found."
    fi
}

# Function to remove images
cleanup_images() {
    echo -e "${BLUE}🖼️  Removing Christian Faith Web images...${NC}"

    # Get all Christian Faith Web images (including intermediate images)
    IMAGES=$(docker images --filter "reference=*christian-faith-web*" --format "{{.Repository}}:{{.Tag}}" 2>/dev/null | grep -v "<none>" || true)

    # Also check for images built from the project
    LOCAL_IMAGES=$(docker images --filter "label=project=christian-faith-web" --format "{{.Repository}}:{{.Tag}}" 2>/dev/null | grep -v "<none>" || true)

    # Combine and deduplicate
    ALL_IMAGES=$(echo -e "$IMAGES\n$LOCAL_IMAGES" | sort -u | grep -v "^$" || true)

    if [ -n "$ALL_IMAGES" ]; then
        echo "Found images:"
        echo "$ALL_IMAGES"
        echo "Removing images..."
        echo "$ALL_IMAGES" | xargs -r docker rmi -f
        echo -e "${GREEN}✅ Images removed${NC}"
    else
        echo "No Christian Faith Web images found."
    fi

    # Clean up dangling images related to the project
    echo "Cleaning up dangling images..."
    docker image prune -f
}

# Function to remove networks
cleanup_networks() {
    echo -e "${BLUE}🌐 Removing Christian Faith Web networks...${NC}"

    # Get all Christian Faith Web networks
    NETWORKS=$(docker network ls --filter "name=christian-faith-web" --format "{{.Name}}" 2>/dev/null || true)

    if [ -n "$NETWORKS" ]; then
        echo "Found networks:"
        echo "$NETWORKS"
        echo "Removing networks..."
        echo "$NETWORKS" | xargs -r docker network rm
        echo -e "${GREEN}✅ Networks removed${NC}"
    else
        echo "No Christian Faith Web networks found."
    fi
}

# Function to clean up docker-compose orphans
cleanup_compose() {
    echo -e "${BLUE}🧹 Cleaning up docker-compose resources...${NC}"

    # Check each environment
    for env in local dev staging prod; do
        if [ -d "/Users/dcppsw/Projects/prismweb/prismweb-web/devops/$env" ]; then
            echo "Cleaning up $env environment..."
            cd "/Users/dcppsw/Projects/prismweb/prismweb-web/devops/$env"
            docker compose down -v --remove-orphans 2>/dev/null || true
        fi
    done

    cd "/Users/dcppsw/Projects/prismweb/prismweb-web"
}

# Main cleanup process
echo -e "${YELLOW}Starting cleanup process...${NC}"
echo ""

# Run cleanup in specific order
cleanup_compose
cleanup_containers
cleanup_volumes
cleanup_images
cleanup_networks

# Final cleanup of Docker system
echo -e "${BLUE}🔧 Running Docker system prune...${NC}"
docker system prune -f --volumes

echo ""
echo -e "${GREEN}✨ Christian Faith Web Docker cleanup completed!${NC}"
echo -e "${YELLOW}💡 Note: You may need to rebuild your Docker images when you start the project again.${NC}"
echo ""
echo "To rebuild and start the project:"
echo -e "${BLUE}cd devops/local && ./start-local.sh${NC}"

# Deploy Frozen Gen to Railway

## Prerequisites
- GitHub account
- Railway account (sign up at railway.app)

## Step 1: Prepare Repository
1. Create a new repository on GitHub named `frozen-gen`
2. Upload all files from the `F:\frozen-gen-deploy` folder to your GitHub repository

## Step 2: Database Setup on Railway
1. Go to [Railway Dashboard](https://railway.app/dashboard)
2. Click "New Project" → "Provision MySQL"
3. Note down the database connection details from the "Variables" tab

## Step 3: Deploy Application
1. Click "New Project" → "Deploy from GitHub repo"
2. Select your `frozen-gen` repository
3. Railway will automatically detect it's a PHP application

## Step 4: Configure Environment Variables
In your Railway project dashboard:
1. Go to "Variables" tab
2. Add these variables:
   ```
   DB_HOST = [Your MySQL host from step 2]
   DB_USER = [Your MySQL username]
   DB_PASS = [Your MySQL password]  
   DB_NAME = [Your MySQL database name]
   ```

## Step 5: Import Database Schema
1. Connect to your Railway MySQL database using a MySQL client
2. Run the SQL commands from `database-schema.sql`

## Step 6: Configure Domain (Optional)
1. Go to "Settings" → "Domains"
2. Add a custom domain or use the provided Railway subdomain

## Environment Variables Railway Provides:
- `RAILWAY_ENVIRONMENT` = production
- `DATABASE_URL` = Full database connection string
- `PORT` = Application port

## Deployment URL
Your app will be available at: `https://frozen-gen-production.up.railway.app`

## Troubleshooting
- Check "Deployments" tab for build logs
- Check "Metrics" for runtime errors
- Use Railway CLI for local debugging: `npm install -g @railway/cli`
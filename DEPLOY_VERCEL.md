# Deploy Frozen Gen to Vercel

## Prerequisites
- GitHub account  
- Vercel account (sign up at vercel.com)
- External MySQL database (PlanetScale, Railway, or other)

## Step 1: Prepare Repository
1. Create a new repository on GitHub named `frozen-gen`
2. Upload all files from the `F:\frozen-gen-deploy` folder to your GitHub repository

## Step 2: Database Setup
Since Vercel doesn't provide MySQL hosting, you'll need an external database:

### Option A: PlanetScale (Recommended)
1. Sign up at [PlanetScale](https://planetscale.com)
2. Create a new database called `frozen-gen`
3. Get connection details from the dashboard

### Option B: Railway MySQL
1. Create a MySQL database on Railway
2. Use it just for the database (not hosting)

## Step 3: Deploy to Vercel
1. Go to [Vercel Dashboard](https://vercel.com/dashboard)
2. Click "New Project"
3. Import your GitHub repository
4. Vercel will detect the `vercel.json` configuration

## Step 4: Configure Environment Variables
In Vercel project settings:
1. Go to "Settings" → "Environment Variables"
2. Add these variables:
   ```
   DB_HOST = [Your database host]
   DB_USER = [Your database username]
   DB_PASS = [Your database password]
   DB_NAME = frozen_gen
   NODE_ENV = production
   ```

## Step 5: Import Database Schema
1. Connect to your external MySQL database
2. Run the SQL commands from `database-schema.sql`

## Step 6: Custom Domain (Optional)
1. Go to "Settings" → "Domains"
2. Add your custom domain

## Vercel Configuration Files:
- `vercel.json` - Deployment configuration
- `package.json` - Project metadata

## Environment Variables Vercel Provides:
- `VERCEL` = 1
- `VERCEL_URL` = Deployment URL
- `NODE_ENV` = production

## Deployment URL
Your app will be available at: `https://frozen-gen.vercel.app`

## Important Notes for Vercel:
- Vercel is optimized for serverless functions
- Each PHP file becomes a serverless function
- Database connections should be handled carefully (connection pooling recommended)
- Static assets are served from CDN

## Troubleshooting
- Check "Deployments" for build logs
- Check "Functions" tab for runtime errors  
- Use `vercel dev` for local testing